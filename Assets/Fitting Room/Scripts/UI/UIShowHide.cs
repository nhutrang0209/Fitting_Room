using System;
using DG.Tweening;
using UnityEngine;

namespace Fitting_Room
{
    public class UIShowHide : MonoBehaviour
    {
        [SerializeField] private Transform hidePos;
        [SerializeField] private float moveDuration;

        private Vector3 _showPos;
        private Vector3 _hidePos;

        protected virtual void Start()
        {
            _showPos = transform.position;
            _hidePos = hidePos.position;
        }

        public virtual void Show()
        {
            transform.DOKill();
            transform.DOMove(_showPos, moveDuration);
        }

        public virtual void Hide()
        {
            transform.DOKill();
            transform.DOMove(_hidePos, moveDuration);
        }

        public virtual void HideImmediately()
        {
            transform.position = _hidePos;
        }
    }
}