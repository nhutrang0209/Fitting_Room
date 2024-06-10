using UnityEngine;
using UnityEngine.Serialization;
using UnityEngine.UI;

namespace Fitting_Room
{
    public class ColliderAdjustment : MonoBehaviour
    {
        [SerializeField] private Transform[] bodyParts;
        [SerializeField] private Button plusBtn;
        [SerializeField] private Button minusBtn;
    
        [SerializeField] private float deltaValue;

        [Header("Body adj transform")] 
        [SerializeField] private Vector3 deltaTransform;
        
        [SerializeField] private CapsuleCollider[] capsuleColliders;
        [SerializeField] private SphereCollider[] sphereColliders;

        private Vector3 _size;
        
        private void Start()
        {
            _size = Vector3.one;
            plusBtn.onClick.AddListener(OnPlusClick);
            minusBtn.onClick.AddListener(OnMinusClick);
        }
    
        private void OnPlusClick()
        {
            _size += deltaTransform;

            foreach (var bodyPart in bodyParts)
            {
                bodyPart.localScale = _size;
            }
            
            // foreach (var collider in capsuleColliders)
            // {
            //     collider.radius += deltaValue;
            // }
            //
            // foreach (var collider in sphereColliders)
            // {
            //     collider.radius += deltaValue;
            // }
        }
    
        private void OnMinusClick()
        {
            _size -= deltaTransform;

            foreach (var bodyPart in bodyParts)
            {
                bodyPart.localScale = _size;
            }
        }
    }

}

